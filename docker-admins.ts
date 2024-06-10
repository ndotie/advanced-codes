1. clearing white spaces on files using docker and perl syntax onliner
docker run --rm -it -v "$(pwd):/usr/src/app" -w /usr/src/app perl:slim sh -c "perl -lpe 's/^\s*//' sample.txt > temp.txt && mv temp.txt sample.txt"
