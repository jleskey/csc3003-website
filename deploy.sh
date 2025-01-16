cd "$(realpath `dirname "$0"`)"

scp -r src/* josleskey@cs.mvnu.edu:/var/www/html/class/csc3003/josleskey/lab2/
