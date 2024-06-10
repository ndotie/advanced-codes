## Python

This for counting number of lines, words,letters in a given file and output the count on the console

the script is as below

````docker container run --rm -it \
-v "$(pwd):/usr/src/app" \
-w /usr/src/app \
python:3-alpine python stats.py sample.txt```

````

windows doesnt like backslack thingy so we go with

`docker container run --rm -it -v "$(pwd):/usr/src/app" -w /usr/src/app  python:3-alpine python stats.py sample.txt`
