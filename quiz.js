const questions = [
    "How would you rate your overall mental health?",
    "Do you often experience feelings of sadness or hopelessness?",
    "How well do you cope with stress in your daily life?",
    "Have you ever sought professional help for mental health concerns?",
    "Do you engage in regular physical activity or exercise?",
    "How well do you sleep at night?",
    "Have you ever experienced panic attacks or severe anxiety?",
    "How often do you engage in activities that you enjoy and find fulfilling?",
    "Are you satisfied with your relationships and social connections?",
    "Do you have a strong support system of friends and family?"
];

let currentQuestionIndex = 0;
let totalScore = 0;

const quizContainer = document.getElementById('quiz-container');
const resultContainer = document.getElementById('result-container');
const totalScoreElement = document.getElementById('total-score');
const resultInterpretation = document.getElementById('result-interpretation');
const resetButton = document.getElementById('reset-button');

function displayQuestion() {
    quizContainer.innerHTML = '';
    const question = questions[currentQuestionIndex];
    const questionElement = document.createElement('div');
    questionElement.classList.add('question');
    questionElement.innerHTML = `
        <label>${currentQuestionIndex + 1}. ${question}</label>
        <input type="radio" name="response" value="4">A. Excellent<br>
        <input type="radio" name="response" value="3">B. Good<br>
        <input type="radio" name="response" value="2">C. Fair<br>
        <input type="radio" name="response" value="1">D. Poor<br>
    `;
    quizContainer.appendChild(questionElement);

    const nextButton = document.createElement('button');
    nextButton.textContent = 'Next';
    nextButton.addEventListener('click', handleNext);
    quizContainer.appendChild(nextButton);
}

function handleNext() {
    const selectedResponse = document.querySelector('input[name="response"]:checked');
    if (selectedResponse) {
        totalScore += parseInt(selectedResponse.value);
        currentQuestionIndex++;

        if (currentQuestionIndex < questions.length) {
            displayQuestion();
        } else {
            displayResults();
        }
    }
}

function displayResults() {
    quizContainer.style.display = 'none';
    resultContainer.style.display = 'block';
    totalScoreElement.textContent = totalScore;

    if (totalScore >= 36 && totalScore <= 40) {
        resultInterpretation.innerHTML = "<p>You're doing great! You seem to be in a good place mentally. Keep up the positive habits that support your well-being and continue to prioritize self-care.</p>";
    } else if (totalScore >= 30 && totalScore <= 35) {
        resultInterpretation.innerHTML = "<p>You're doing okay, but there's room for improvement. It’s important to reflect on areas where you might feel a bit off and take steps to address them. Remember, small changes can make a big difference.</p>";
    } else if (totalScore >= 20 && totalScore <= 29) {
        resultInterpretation.innerHTML = "<p>It seems like you're struggling in some areas. Take time to focus on your mental health and consider reaching out to a trusted friend, family member, or professional for support. Remember, it's okay to ask for help.</p>";
    } else if (totalScore >= 10 && totalScore <= 19) {
        resultInterpretation.innerHTML = "<p>Your responses indicate you're having a tough time. Please prioritize your mental health and seek help from a mental health professional or a support system. You don’t have to face this alone, and there are people who care and want to help.</p>";
    }

    resetButton.addEventListener('click', resetQuiz);
}

function resetQuiz() {
    currentQuestionIndex = 0;
    totalScore = 0;
    quizContainer.style.display = 'block';
    resultContainer.style.display = 'none';
    displayQuestion();
}

displayQuestion();