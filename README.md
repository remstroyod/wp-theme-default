# Default Theme

### System Requirements
1. Docker Engine (https://docs.docker.com/get-docker/)
2. Git

### Setup local environment
1. Clone GIT repository

### Development process
1. Switch to branch `main` and pull changes
2. Create new branch from `main`. Branch name template is `feature/{task-number}-{task-name}`
3. Run `sh scripts/develop.sh` on macOS or `.\scripts\develop.sh` on Windows
4. Write code in your branch
5. When task is ready for testing switch to branch `develop` and pull changes
6. Merge your branch into `develop`. Upload code to staging sever
7. Test your task on staging server
8. Change task status in Redmine to 'Ready for testing'
9. Run `sh scripts/stop.sh` on macOS or `.\scripts\stop.sh` on Windows to stop docker containers

It is important to merge the `main` branch into your branch when you start working. In this case, your branch will always be up-to-date.

### URLs
1. Local website: https://localhost:8443/
2. phpMyAdmin: http://localhost:8089/

### Scripts
1. `scripts/develop.sh` - start containers. Used for local development
2. `scripts/stop.sh` - stop containers
