echo 'Step 1: Pulling latest changes from GitHub'

git pull origin main

echo 'Step 2: Rebuild'

docker-compose up -d --force-recreate --build