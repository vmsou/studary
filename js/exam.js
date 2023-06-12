const questions = [
    {
        question: "Qual o significado do pronome 'We'?",
        answers: [
            { text: "Eles", result: false },
            { text: "Ela", result: false },
            { text: "Nós", result: true },
            { text: "Eu", result: false },
        ]
    },
    {
        question: "Considerando a frase: 'I ... a teacher'. Qual palavra completa esta frase?",
        answers: [
            { text: "am", result: true },
            { text: "an", result: false },
            { text: "are", result: false },
            { text: "is", result: false },
        ]
    },
];



function main() {
    const questionHeader = document.getElementById("question");
    const questionCount = document.getElementById("question-count");
    const answerButtons = document.getElementById("answer-btns");
    const backButton = document.getElementById("back-btn");
    const questionNumber = document.getElementById("question-number");
    const nextButton = document.getElementById("next-btn");
    const quizResult = document.getElementById("quiz-result");
    const endQuiz = document.getElementById("end-quiz");

    let qIdx = 0;
    let nQuestions = questions.length;
    let userAnswers = {};
    let correctAnswer = {};

    if (nQuestions === 0) {
        alertModal("error", "Não foi possivel carregar simulado.");
        setTimeout(() => {
            window.location.href = "index.php";
        }, 1000);
    }

    for (let i = 0; i < nQuestions; ++i) {
        for (let answer of questions[i].answers) {
            if (answer.result) correctAnswer[i] = answer.text;
        }
    }

    function getScore() {
        let score = 0;
        for (let i = 0; i < nQuestions; ++i) {
            let userAnswer = userAnswers[i];
            if (userAnswer === correctAnswer[i]) score += 1;
        }
        return score;
    }

    function createAnswerButton(answer) {
        let answerButton = document.createElement("button");
        answerButton.classList.add("answer-btn");
        answerButton.innerText = answer.text;
        if (userAnswers[qIdx] === answer.text) answerButton.classList.add("active");
        answerButton.onclick = () => {
            for (let btn of answerButtons.children) {
                btn.classList.remove("active");
            }
            userAnswers[qIdx] = answer.text;
            answerButton.classList.add("active");
            questionCount.innerText = `${Object.keys(userAnswers).length}/${nQuestions}`
        }
        return answerButton;
    }

    function feedbackModal() {
        let score = getScore();

        let popupDiv = document.createElement("div");
        popupDiv.classList.add("popup");

        let img = document.createElement("img");
        img.src = "img/logo.png";
        popupDiv.appendChild(img);
        
        let h2 = document.createElement("h2");
        h2.innerText = "Feedback";
        popupDiv.appendChild(h2);
    
        let p1 = document.createElement("p");
        p1.innerText = `Você obteve uma pontuação de: ${score}/${nQuestions}`;
        let p2 = document.createElement("p");
        p2.innerText += "Para receber um feedback aprimorado se inscreva-se no nosso plano"
        popupDiv.appendChild(p1);
        popupDiv.appendChild(p2);

        let okButton = document.createElement("button");
        okButton.innerText = "OK";
        okButton.onclick = () => { popupDiv.remove(); }
        popupDiv.appendChild(okButton);

        let premiumButton = document.createElement("button");
        premiumButton.classList.add("premium");
        premiumButton.innerText = "Premium";
        premiumButton.onclick = () => { document.window.href = "premium.php"; }
        popupDiv.appendChild(premiumButton);

        document.body.appendChild(popupDiv);
    }

    function updateQuestion(data) {
        questionHeader.innerText = data.question;
        questionCount.innerText = `${Object.keys(userAnswers).length}/${nQuestions}`
        questionNumber.innerText = qIdx + 1;

        // Update answers buttons
        answerButtons.innerHTML = "";
        data.answers.forEach(answer => {
            let answerButton = createAnswerButton(answer);
            answerButtons.appendChild(answerButton);
        });
    }

    function showAnswer() {
        for (let btn of answerButtons.children) {
            btn.onclick = undefined;
            if (btn.innerText === correctAnswer[qIdx]) {
                btn.classList.add("correct");
            }
            if (btn.classList.contains("active")) {
                btn.classList.remove("active");
                btn.classList.add("incorrect");
            }
        }
    }

    nextButton.onclick = () => {
        qIdx = (qIdx + 1) % nQuestions;
        updateQuestion(questions[qIdx]);
    }

    backButton.onclick = () => {
        qIdx = qIdx - 1;
        if (qIdx < 0) qIdx = nQuestions - 1;
        updateQuestion(questions[qIdx]);
    }

    endQuiz.onclick = () => {
        showAnswer();

        nextButton.onclick = () => {
            qIdx = (qIdx + 1) % nQuestions;
            updateQuestion(questions[qIdx]);
            showAnswer();
        }
    
        backButton.onclick = () => {
            qIdx = qIdx - 1;
            if (qIdx < 0) qIdx = nQuestions - 1;
            updateQuestion(questions[qIdx]);
            showAnswer();
        }
        
        endQuiz.innerText = "Feedback"
        endQuiz.onclick = feedbackModal;
    }
    
    
    updateQuestion(questions[qIdx]);
}

window.onload = () => {
    main();
}
