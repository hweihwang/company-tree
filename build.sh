echo 'Step 1: Pulling latest changes from GitHub'

git pull origin main

echo 'Step 2: Rebuild docker images'

docker-compose build php