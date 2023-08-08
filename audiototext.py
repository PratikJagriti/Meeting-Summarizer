import sys
import whisper
filename = sys.argv[1]
model=whisper.load_model('base')
result=model.transcribe(filename,fp16=False)
print(result['text'])
