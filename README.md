# Meeting-Summarizer

Installation of necessary Software and Modules

Step1:Download and install xampp
follow this link to downlaod xampp : https://www.apachefriends.org/

Step2:Install Python
follow this link to downlaod python : https://www.python.org/downloads/release/python-3109/

Step3:Install PyTorch
open command promt and run this command: pip3 install torch torchvision torchaudio

Step4:Install chocolatey package manager

open windows powershell and run this command :

Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))

Step5:Install ffmpeg
run this command in powershell: choco install ffmpeg

Step6: Install whisper module
run this command in terminal : pip install -U openai-whisper

step6: install necessary python modules
To install spacy : pip install spacy

STEPS TO RUN THE PROJECT

*Go to this file path C:\xampp\htdocs
*paste the project folder inside the htdocs folder
*open xampp application start both apache and mysql
*To run the project go to web browser and type the following code in searchbar
localhost/project/
*Incase if u are using visual studio code install php server extension in visual studio
