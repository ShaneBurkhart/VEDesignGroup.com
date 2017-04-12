all: run

run:
	docker-compose up -d

stop:
	docker-compose down

deploy:
	ssh -A ubuntu@35.165.215.109 'cd ~/VEDesignGroup.com; git pull origin master'
