
## Content of the example task 'symfony-messenger-rabbitmq'

## Image downloader with queueing

Application that allows user to download images from remote servers.



## Details

- Create a PHP Symfony application that serves a web page with a form that consists of textarea and submit button.

- Image URL(s) will be pasted into the textarea, every new line means a new image to download and process.

- Each image must be a separate message in RabbitMQ (or any other queue of your preference)

- Create a worker process that reads messages from the queue and downloads images to a local folder, file names can be random, but keep the original image extension.



## Requirements

- Jobs cannot be lost from the queue in case the worker process dies.

- Have a `Makefile`

- Use docker-compose
