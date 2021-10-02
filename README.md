## About SolCheck

SolCheck is a webapp designed to inform and encourage others to convert to solar energy. 

## Setting it up locally
### Prerequisites:
- Composer: https://getcomposer.org/
- Wampserver: https://www.wampserver.com/en/ (XAMPP also works!)
- Git Command line: https://git-scm.com/
- HeidiSQL: https://www.heidisql.com/

### Steps
1. Once you have installed the prerequisites, go to c:/wamp64/www/ and press the right click button, select "Git Bash Here". A window will pop up with a screen you can type into.
2. Type in "git clone https://github.com/SolT3chTeam/SolCheck.git".
3. Once it is done downloading all of the files, type in "cd solcheck" (could vary depending on the name of the folder. What this does is we change directory (cd) to the new folder where our code is).
4. Type "composer install" to get all of the files to get the web app up and running.
5. Navigate to the .env.example file using your file manager and rename it to .env
6. Back to the git bash command line, type in php artisan migrate:fresh. You will need to create the database first called "solcheck". HeidiSQL makes this easy.
7. Start up wampserver and go to your browser. "http://localhost/solcheck/public"

