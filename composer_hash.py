import requests
import re
from bs4 import BeautifulSoup

url = 'https://getcomposer.org/download/'
paths = ['./backend/Dockerfile', './fcc/Dockerfile', './main/Dockerfile', './redirect/Dockerfile']

response = requests.get(url)
pattern = re.compile(r"\=\=\= \'(.+?)\'\) \{")
var_hash = ''

soup = BeautifulSoup(response.text, 'html.parser')

pre_tags = soup.find('pre', class_='installer')
matches = pattern.findall(pre_tags.text)
for match in matches:
    var_hash = match

for x in paths:
    with open(x, 'r+') as file:
        content = file.read()
        updated_content = re.sub(r'\{hash\}', var_hash, content)
        file.seek(0)
        file.truncate()
        file.write(updated_content)