const inquirer = require('inquirer')
const questions = [{
    type: 'input',
    name: 'str',
    message: "Введите произвольно последовательность игроков (0 - одна команда, 1 - другая команда): ",
}]

function getAnswers() {
    return inquirer.prompt(questions).then((answers) => {
        if (!answers.str) {
            console.log("Вы ничего не ввели");
            return getAnswers();
        } else {
            let str = answers.str;
            var count = 0;

            const team1 = str.match(/1+/g).map((far) => far.length);
            const team2 = str.match(/0+/g).map((far) => far.length);
            const team = team1.concat(team2);
            for (let i = 0; i < team.length; i++) {
                if (team[i] >= 7) {
                    count++;
                }
            }
            if (count >= 1) {
                console.log("YES");
                return getAnswers();
            } else {
                console.log("NO");
                return getAnswers();
            }
        }
    });
}

getAnswers();
