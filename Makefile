all: run

run:
	docker-compose up -d

stop:
	docker-compose down

deploy:
	ssh -A ubuntu@ 'cd ~/CustomWordpressTheme; git pull origin master'
