#!/usr/bin/env python
from gtts import gTTS
import os
import glob
path = "/mydir";

os.chdir(path)
for file in glob.glob("*.txt"):
    print(file)

    
with open('storage/ttsyt/article.txt', 'r') as myfile:
    data=myfile.read().replace('\n', '')

tts = gTTS(text=data, lang='en')
tts.save("storage/ttsyt/good.mp3")

#gtts-cli.py -f article.txt -l 'en' -o hello.mp3