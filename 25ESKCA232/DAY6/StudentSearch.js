

let allStudents = [];

const studentNames = [
    "Aarav Sharma",
    "Tanvi Goyal",
    "Vivaan Singh",
    "Diya Verma",
    "Aditya Mehta",
    "Ananya Gupta",
    "Kabir Kapoor",
    "Ishita Jain",
    "Arjun Patel",
    "Meera Joshi",
    "Rohan Bansal",
    "Priya Nair",
    "Kunal Soni",
    "Sneha Agarwal",
    "Dev Malhotra",
    "Ritika Arora",
    "Aryan Yadav",
    "Khushi Saxena",
    "Yash Raj",
    "Simran Kaur"
];

const branches = [
    "Computer Science Engineering",
    "Artificial Intelligence & Data Science",
    "Information Technology",
    "Electronics & Communication",
    "Mechanical Engineering",
    "Civil Engineering",
    "Electrical Engineering"
];

const programmes = [
    "B.Tech",
    "BCA",
    "MCA",
    "B.Sc Computer Science"
];

function getCGPA(index) {
    return (7.2 + (index % 25) * 0.08).toFixed(2);
}

function displayStudents(students) {

    let cards = "";

    students.forEach((student, index) => {

        const studentId = "STU" + String(student.id).padStart(3, "0");

        const name = studentNames[index % studentNames.length];

        const branch = branches[index % branches.length];

        const programme = programmes[index % programmes.length];

        const cgpa = getCGPA(index);

        cards += `
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">

                    <h4 class="card-title fw-bold">
                        ${name}
                    </h4>

                    <p class="mb-2">
                        <strong>CGPA:</strong> ${cgpa}
                    </p>

                    <p class="mb-2">
                        <strong>Branch:</strong> ${branch}
                    </p>

                    <p class="mb-3">
                        <strong>Programme:</strong> ${programme}
                    </p>

                    <span class="badge bg-success">
                        Student ID : ${studentId}
                    </span>

                </div>
            </div>
        </div>
        `;
    });

    $("#posts").html(cards);
}

function loadStudents() {

    $("#posts").html(`
        <div class="text-center mt-5">
            <h4>Loading Students...</h4>
        </div>
    `);

    fetch("https://jsonplaceholder.typicode.com/posts")

        .then(response => response.json())

        .then(data => {

            allStudents = data;

            displayStudents(allStudents);

        })

        .catch(() => {

            $("#posts").html(`
                <div class="text-center">

                    <h3 class="text-danger">
                        Unable to load students.
                    </h3>

                    <button class="btn btn-primary mt-3"
                    onclick="loadStudents()">
                        Retry
                    </button>

                </div>
            `);

        });

}

$("#search").on("keyup", function () {

    let value = $(this).val().toLowerCase();

    let filtered = allStudents.filter((student, index) => {

        let name = studentNames[index % studentNames.length].toLowerCase();

        return name.includes(value);

    });

    displayStudents(filtered);

});

loadStudents();