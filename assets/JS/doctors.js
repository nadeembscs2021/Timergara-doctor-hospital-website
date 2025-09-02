document.querySelectorAll(".view-profile-btn").forEach((button) => {
  button.addEventListener("click", () => {
    const doctor = JSON.parse(button.getAttribute("data-doctor"));
    document.getElementById("doctorImage").src = doctor.image;
    document.getElementById("doctorName").textContent = doctor.name;
    document.getElementById("doctorSpecialty").textContent = doctor.specialty;
    document.getElementById("doctorExperience").textContent = doctor.experience;
    document.getElementById("doctorDescription").textContent =
      doctor.description;
    document.getElementById("doctorEducation").textContent = doctor.education;
    document.getElementById("doctorSchedule").textContent = doctor.schedule;
  });
});

const searchInput = document.getElementById("searchInput");
const departmentFilter = document.getElementById("departmentFilter");
const cards = document.querySelectorAll(".doctor-card");

function filterDoctors() {
  const searchValue = searchInput.value.toLowerCase();
  const departmentValue = departmentFilter.value;

  cards.forEach((card) => {
    const name = card.dataset.name;
    const specialty = card.dataset.specialty;
    const department = card.dataset.department;

    const matchesSearch =
      name.includes(searchValue) || specialty.includes(searchValue);
    const matchesDepartment =
      !departmentValue || department === departmentValue;

    if (matchesSearch && matchesDepartment) {
      card.style.display = "block";
    } else {
      card.style.display = "none";
    }
  });
}

searchInput.addEventListener("input", filterDoctors);
departmentFilter.addEventListener("change", filterDoctors);
