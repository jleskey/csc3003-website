cd "$(realpath `dirname "$0"`)"

rsync \
    --recursive \
    --compress \
    --partial \
    --progress \
    --delete \
    src/ josleskey@cs.mvnu.edu:/var/www/html/class/csc3003/josleskey/lab8/
