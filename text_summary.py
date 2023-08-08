import spacy
import sys
from spacy.lang.en.stop_words import STOP_WORDS
from string import punctuation
from heapq import nlargest
from spacy import displacy
from collections import defaultdict

# Load the English language model and create a set of stop words
nlp = spacy.load('en_core_web_sm')
stop_words = STOP_WORDS.union(set(punctuation))

# Get the input text
raw_docs = sys.argv[1]

# Parse the text and extract the sentences
doc = nlp(raw_docs)
sentences = [sent for sent in doc.sents]

# Calculate the term frequency for each word
word_freq = defaultdict(float)
for word in doc:
    if word.text.lower() not in stop_words:
        word_freq[word.text] += 1

# Normalize the term frequency by the maximum frequency
max_freq = max(word_freq.values())
for word in word_freq:
    word_freq[word] /= max_freq

# Build the word co-occurrence matrix
co_occurrences = defaultdict(float)
for sent in sentences:
    words = [token.text.lower() for token in sent if token.text.lower() not in stop_words]
    for i, word in enumerate(words):
        for j in range(i + 1, min(i + 3, len(words))):
            co_occurrences[(word, words[j])] += 1

# Calculate the sentence scores using TextRank algorithm
alpha = 0.85  # Damping factor
iteration = 10  # Number of iterations
sentence_scores = defaultdict(float)
for _ in range(iteration):
    for sent in sentences:
        words = [token.text.lower() for token in sent if token.text.lower() not in stop_words]
        for word in words:
            score = sum(co_occurrences[(word, other_word)] * word_freq[other_word] for other_word in words if
                        other_word != word)
            sentence_scores[sent] += alpha * score / len(words) + (1 - alpha)

# Select the top sentences based on their scores
select_len = int(len(sentences) * 0.3)
summary = nlargest(select_len, sentence_scores, key=sentence_scores.get)
final_summary = [sent.text for sent in summary]
summary = ' '.join(final_summary)

# Print the summary, the original text, and some statistics
print(summary)
print(doc)
print(len(raw_docs.split(' ')))
print(len(summary.split(' ')))
