# LawnStarter SW App

## Setting up development environment

1. [Install docker](https://docs.docker.com/get-docker)
2. [Install docker compose](https://docs.docker.com/compose/install)
3. [Install composer](https://getcomposer.org/download/)
4. Clone this repository
5. run `$ git submodule init`
6. run `$ git submodule update`
7. run `$ composer install`
8. Navigate to the `frontend` folder and run `npm ci`
9. Navigate back to the project root folder and run `$ docker-compose up -d` (it will take some time on the first time)
10. run `$ docker-compose exec worker php artisan migrate`
    - Sidenote: Usually the MySQL container, when built (step 9), creates automatically the database. But, for reasons uknown, sometime it does not. If the migrate command fails, you will need to create manually a database `lawn_starter` on the MySQL container :) you can access it through command `$ docker-compose exec mysql sh`

### Frontend

- http://localhost:8080

### Statistics Endpoint

- http://localhost/statistics

## Short answer questions

1. What are you hoping to find in your next position that would make it the right next step in your career?

    R. I hope to work a little with new technologies, maybe a bit of AI or data science (which are techs that I am curious about, studied a bit, but never worked with). Also, deal a little bit more with infrastructure and archtecture... Understand more about it and learn how to make better decisions regarding these subjects.

2. What have you learned so far about LawnStarter that excited you?

    R. The company proposes to tackle a problem people usually have, that may seem simple/irrelevant, but actually is a source of headache most of the time: find reliable/dependable people to fix/pump up/maintain something at your home. That is, in my humble opinion, the main goal of technology itself: Make people's life easier and/or lift the heavy weight of daily tasks/decisions from people's shoulders. That is enough for me to get exited about Lawn Starter business model. :D

3. Have you worked in an environment where developers own delivering features all the way to production? We have QA (Quality Assurance) and a Product Operations team, however, they exist to provide support to engineers. Are you comfortable going to a place where the quality buck stops with the engineers and you have the ability to deploy and observe your own code in production?

    R. Actually that is how it works on my current job. We use kanban on Jira, and we develop a software which our client if basically our own company. We work with continuous deployment, so we actually do not versionate the application... We code a feature, unit/integration test it, the code goes to a code-review/staging test round, and once approved it is merged into master and goes to production. Usually there are quite a few deploys to production daily. Also, we are close to the operations team, which are those who use the software, so we are able to observe they using what we develop, either through monitoring techs or actually watching them, and adjust things accordingly.

4. What is the next technology or subject you are hoping to learn about?

    R. I am currently studying a little os python, aiming to learn Image processing/AI. I have an idea of a project to help my wife on her job (she works in a quality assurance microbiology lab). Most of the analysis she does are performed analyzing the samples visually. That could be enhanced thorugh modern image processing technologies ;)
