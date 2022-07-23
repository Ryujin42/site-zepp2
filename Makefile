all: install story

install:
	npm install

start:
	npm run start

watch:
	npm run build:watch

story:
	npm run storybook

test:
	npm run test:watch

translations:
	npm run translations

snapshot:
	npm run test:snapshot
