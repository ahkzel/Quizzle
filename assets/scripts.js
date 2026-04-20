const questions_type_1 = ["binaire", "choix_multiple", "binaire", "binaire", "choix_multiple", "binaire", "binaire"];
const questions_type_2 = ["choix_multiple", "choix_multiple", "choix_multiple", "binaire"];
const questions_type_3 = ["littérature", "cinema", "cinema", "nature"];

function processData(responses) {
    const counts = {};
    responses.forEach(r => {
        counts[r] = (counts[r] || 0) + 1;
    });
    return {
        labels: Object.keys(counts),
        values: Object.values(counts)
    };
}

function createChart(id, labels, data) {
    new Chart(document.getElementById(id), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data
            }]
        }
    });
}

const q1 = processData(questions_type_1);
createChart('quizz1', q1.labels, q1.values);

const q2 = processData(questions_type_2);
createChart('quizz2', q2.labels, q2.values);

const q3 = processData(questions_type_3);
createChart('quizz3', q3.labels, q3.values);