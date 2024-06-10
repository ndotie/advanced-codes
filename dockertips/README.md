This is about perl script reading the the existing file and removing the white spaces from the file

```docker run --rm -it -v "$(pwd):/usr/src/app" -w /usr/src/app perl:slim sh -c "perl -lpe 's/^\s*//' sample.txt > temp.txt && mv temp.txt sample.txt"```
