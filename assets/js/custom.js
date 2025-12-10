/* ===========================
   POPUP CONTROL
=========================== */
function openPopup(id) {
  const el = document.getElementById(id);
  if (!el) return;
  el.style.display = "flex";
  document.body.classList.add("popup-open");
}

function closePopup(id) {
  const el = document.getElementById(id);
  if (!el) return;
  el.style.display = "none";
  document.body.classList.remove("popup-open");
}

// Close popup when clicking outside
document.addEventListener("click", function (e) {
  if (e.target.classList.contains("popup-overlay")) {
    e.target.style.display = "none";
    document.body.classList.remove("popup-open");
  }
});

/* ===========================
   SCROLL TO SEARCH SECTION
=========================== */
function scrollToPackageSearch() {
  const el = document.getElementById("packageSearchSection");
  if (el) el.scrollIntoView({ behavior: "smooth" });
}

/* ===========================
   OPEN SEARCH RESULTS POPUP
=========================== */
function openPackageSearchPopup() {
  const category = document.getElementById("searchType").value;
  const destination = document.getElementById("searchDestination").value;
  const month = document.getElementById("searchMonth").value;

  if (!category || !destination || !month) {
    alert("Please fill all fields");
    return;
  }

  fetch("search_packages.php", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: `category=${encodeURIComponent(category)}&destination=${encodeURIComponent(
      destination
    )}&month=${encodeURIComponent(month)}`
  })
    .then((res) => res.json())
    .then((data) => {
      loadDynamicPackageResults(data.packages || [], data.fallback || false);
      openPopup("packageResultsPopup");
    })
    .catch((err) => {
      console.error(err);
      alert("Something went wrong. Please try again.");
    });
}

/* ===========================
   RENDER SEARCH RESULTS
=========================== */
function loadDynamicPackageResults(packages, fallback = false) {
  const fallbackBox = document.getElementById("fallbackMessageBox");
  const container = document.getElementById("packageResultsContainer");

  if (!fallbackBox || !container) return;

  // Clear previous content
  fallbackBox.innerHTML = "";
  container.innerHTML = "";

  // Fallback message under subtitle, above list
  if (fallback) {
    fallbackBox.innerHTML = `
      <div class="fallback-box">
        <strong>No exact month match.</strong><br>
        Showing all packages for this destination.
      </div>
    `;
  }

  // No packages at all
  if (!packages.length) {
    container.innerHTML = `
      <p style="text-align:center;color:#777;padding:20px;">
        No packages found.
      </p>
    `;
    return;
  }

  // Render packages inside scrollable container
  container.innerHTML = `
    <div class="results-grid-wrapper">
      ${packages
        .map(
          (pkg) => `
        <div class="package-card">
          <img src="admin/image/${pkg.image1}" alt="Package">

          <div class="package-card-body">
            <div class="package-card-title">${pkg.title}</div>

            <div class="package-meta">
              <b>Destination:</b> ${pkg.destination}<br>
              <b>Category:</b> ${pkg.category}
            </div>

            <div class="package-card-price">₹${pkg.price}</div>
            <div class="package-card-duration">${pkg.time}</div>

            <button class="package-card-btn"
              onclick="openPackageEnquiry('${pkg.title.replace(/'/g, "\\'")}')">
              Enquire Now
            </button>
          </div>
        </div>
      `
        )
        .join("")}
    </div>
  `;
}

/*************************************************
    ACHIEVEMENT COUNTERS – ANIMATION LOGIC
**************************************************/

// function animateCounter(element) {
//   const target = parseInt(element.getAttribute("data-value"), 10);
//   if (isNaN(target)) return;

//   let count = 0;
//   const duration = 1500;
//   const start = performance.now();

//   function update(now) {
//     const progress = Math.min((now - start) / duration, 1);
//     count = Math.floor(progress * target);
//     element.textContent = count.toLocaleString();

//     if (progress < 1) {
//       requestAnimationFrame(update);
//     }
//   }

//   requestAnimationFrame(update);
// }

// document.addEventListener("DOMContentLoaded", function () {
//   const counters = document.querySelectorAll(".achievement-value");
//   if (!counters.length) return;

//   const observer = new IntersectionObserver(
//     (entries, obs) => {
//       entries.forEach((entry) => {
//         if (entry.isIntersecting) {
//           animateCounter(entry.target);
//           obs.unobserve(entry.target);
//         }
//       });
//     },
//     { threshold: 0.5 }
//   );

//   counters.forEach((counter) => observer.observe(counter));
// });

/*************************************************
    ACHIEVEMENT COUNTERS – ANIMATION LOGIC
**************************************************/

function animateCounter(element) {
  const target = parseInt(element.getAttribute("data-value"), 10);
  if (isNaN(target)) return;

  let count = 0;
  const duration = 1500;
  const start = performance.now();

  function update(now) {
    const progress = Math.min((now - start) / duration, 1);
    count = Math.floor(progress * target);
    element.textContent = count.toLocaleString();

    if (progress < 1) {
      requestAnimationFrame(update);
    }
  }

  requestAnimationFrame(update);
}

document.addEventListener("DOMContentLoaded", function () {
  const counters = document.querySelectorAll(".achievement-value");
  if (!counters.length) return;

  const observer = new IntersectionObserver(
    (entries, obs) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          obs.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.5 }
  );

  counters.forEach((counter) => observer.observe(counter));
});

document.getElementById("newsletter-form").addEventListener("submit", function (e) {
    e.preventDefault();

    let emailInput = document.querySelector("#newsletter-form input[type='email']");
    let email = emailInput.value.trim();

    let box = document.getElementById("newsletter-success");

    let formData = new FormData();
    formData.append("email", email);

    fetch("admin/sql/newsletter.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())   // Parse JSON response
    .then(data => {

        box.innerHTML = data.message; // Show clean text only
        box.classList.remove("d-none");

        if (data.success) {
            box.classList.remove("alert-danger");
            box.classList.add("alert-success");
            emailInput.value = "";
        } else {
            box.classList.remove("alert-success");
            box.classList.add("alert-danger");
        }

        setTimeout(() => {
            box.classList.add("d-none");
        }, 3000);
    })
    .catch(err => {
        box.innerHTML = "Network error. Please try again.";
        box.classList.remove("d-none");
        box.classList.add("alert-danger");

        setTimeout(() => {
            box.classList.add("d-none");
        }, 3000);
    });
});


/* ===========================
   OPEN PACKAGE ENQUIRY POPUP
=========================== */
function openPackageEnquiry(packageName) {
  closePopup("packageResultsPopup");
  const input = document.getElementById("enquiry_package_name");
  if (input) input.value = packageName;
  openPopup("packageEnquiryPopup");
}

