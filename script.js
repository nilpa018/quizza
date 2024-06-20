let currentQuestionIndex = 0;
let score = 0;
let questions = [];
const quizId = document.location.search.split("=")[1];

$(document).ready(function () {
    $.ajax({
        url: `get_questions.php?quizId=${quizId}`,
        method: 'GET',
        success: function (data) {
            questions = data;
            loadQuestion(currentQuestionIndex);
        },
        error: function (error) {
            console.error("Erreur lors du chargement des questions", error);
        }
    });
});

function loadQuestion(index) {
    const question = questions[index];
    const optionsArray = question.options.split(';');  // Convertit les options en tableau
    $('#question-container').html(`
        <h2 class="mb-3">${question.title}</h2>
        <h5 class="mb-6">${question.question}</h5>
        <ul>
            ${optionsArray.map((option, i) => `<li><button class="btn btn-info" onclick="checkAnswer(${question.question_id},${i + 1})">${option}</button></li>`).join('')}
        </ul>
    `);
}

function checkAnswer(questionId, userAnswer) {
    $.ajax({
        url: 'check_answer.php',
        method: 'POST',
        data: {
            questionId: questionId,
            answer: userAnswer
        },
        success: function (response) {
            if (response.correct) {
                score++;
                $('#score').text(score);
            }
            loadNextQuestion();
        },
        error: function (error) {
            console.error("Erreur lors de la vérification de la réponse", error);
        }
    });
}

function loadNextQuestion() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        loadQuestion(currentQuestionIndex);
    } else {
        showResults();
    }
}

function showResults() {
    $('#question-container').html(`<h2>Quiz terminé !</h2><br><p class="feedback-msg">${showFeedBack(score, questions.length)}</p><p>Ton score est de ${score} sur ${questions.length}.</p>`);
    $('#score-container').addClass('hidden');  // Cache le score en fin de quiz
}

function showFeedBack(score, nbQuestions) {
    const scorePourcentage = ((100 * score) / nbQuestions).toFixed();
    if (scorePourcentage < 15) return "Oups";
    if (scorePourcentage >= 15 && scorePourcentage < 50) return "Tu t'améliores !";
    if (scorePourcentage >= 50 && scorePourcentage < 100) return "Tu gères vraiment !";
    if (scorePourcentage == 100) return "Tu es une machine";
}
