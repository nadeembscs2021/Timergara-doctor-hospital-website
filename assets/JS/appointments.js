const deptSelect = document.getElementById("departmentSelect");
const docSelect = document.getElementById("doctorSelect");
const dateInput = document.getElementById("appointmentDate");
const timeSlotSelect = document.getElementById("timeSelect");

// Filter doctors based on department
deptSelect.addEventListener("change", () => {
  const deptId = deptSelect.value;
  docSelect.innerHTML =
    '<option value="" disabled selected>Choose Doctor</option>';
  doctorData.forEach((doc) => {
    if (doc.deptt_id == deptId) {
      const opt = document.createElement("option");
      opt.value = doc.doctor_id;
      opt.textContent = doc.d_name;
      docSelect.appendChild(opt);
    }
  });
});

// Load time slots when doctor or date changes
docSelect.addEventListener("change", loadTimeSlots);
dateInput.addEventListener("change", loadTimeSlots);

function loadTimeSlots() {
  const selectedDoctorId = docSelect.value;
  const selectedDate = dateInput.value;
  if (!selectedDoctorId || !selectedDate) return;

  const timeSlots = [];
  const addSlots = (start, end) => {
    let startTime = new Date(`1970-01-01T${start}`);
    const endTime = new Date(`1970-01-01T${end}`);
    while (startTime < endTime) {
      timeSlots.push(startTime.toTimeString().substring(0, 5) + ":00");
      startTime.setMinutes(startTime.getMinutes() + 10);
    }
  };

  addSlots("08:00", "13:00"); // Morning
  addSlots("16:00", "20:00"); // Evening

  const bookedTimes = appointmentsData
    .filter(
      (appt) =>
        appt.doctor_id == selectedDoctorId &&
        appt.appointment_date === selectedDate
    )
    .map((appt) => appt.preferred_time);

  timeSlotSelect.innerHTML =
    '<option value="" disabled selected>Select Time</option>';
  timeSlots.forEach((time) => {
    if (!bookedTimes.includes(time)) {
      const [h, m] = time.split(":");
      const label = new Date(1970, 0, 1, h, m).toLocaleTimeString([], {
        hour: "2-digit",
        minute: "2-digit",
      });
      const opt = document.createElement("option");
      opt.value = time;
      opt.textContent = label;
      timeSlotSelect.appendChild(opt);
    }
  });
}
