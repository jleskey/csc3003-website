cd "$(realpath `dirname "$0"`)"

DEST_PATH="/var/www/html/class/csc3003/josleskey/lab16"

rsync \
    --recursive \
    --compress \
    --partial \
    --progress \
    --delete \
    src/ josleskey@cs.mvnu.edu:$DEST_PATH/

ssh josleskey@cs.mvnu.edu "mkdir $DEST_PATH/logs && chmod 777 $DEST_PATH/logs"
