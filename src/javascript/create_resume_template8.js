$(document).ready(function () {
    
    function createAddressHTML(address) {
    return `
      <address class="address">
        <p class="city">${address.city}</p>
        <p class="region" title="${address.region}">${address.region}</p>
        <p class="postal-code">${address.postalCode}</p>
        <p class="country-name">${address.country}</p>
      </address>
    `;
  }

  // Function to create education HTML
  function createEducationHTML(education) {
    return `
      <section class="content-header">
        <h3 class="content-title">
          <a href="${education.schoolLink}">${education.school}</a>
        </h3>
        <p class="date">${education.date}</p>
      </section>
      <p class="location">${education.location}</p>
      <ul class="descriptions">
        <li>${education.degree}</li>
        <li>GPA: ${education.gpa}</li>
        ${education.honors ? `<li>${education.honors}</li>` : ''}
      </ul>
    `;
  }

  // Function to create work experience HTML
  function createWorkExperienceHTML(workExperience) {
    return `
      <section class="content-header">
        <h3 class="content-title">
          <a href="${workExperience.employerLink}">${workExperience.employer}</a>
        </h3>
        <p class="date">${workExperience.date}</p>
      </section>
      <p class="content-title">${workExperience.position}</p>
      <ul class="descriptions">
        ${workExperience.responsibilities.map(responsibility => `<li>${responsibility}</li>`).join('')}
      </ul>
    `;
  }

  // ... (similar functions for other sections)

  // Function to create skills HTML
  function createSkillsHTML(skills) {
    return `
      <ul class="descriptions">
        ${skills.map(skill => `<li>${skill.name}: ${skill.skills.join(', ')}</li>`).join('')}
      </ul>
    `;
  }

  // Function to create relevant coursework HTML
  function createRelevantCourseworkHTML(relevantCoursework) {
    return `<p class="descriptions">${relevantCoursework.join(', ')}</p>`;
  }

  // Function to create activities HTML
  function createActivitiesHTML(activities) {
    return activities.map(activity => `
      <section class="content-header">
        <h3 class="content-title">${activity.organization}</h3>
        <p class="date">${activity.date}</p>
      </section>
      <p class="content-title">${activity.position}</p>
      <ul class="descriptions">
        ${activity.responsibilities.map(responsibility => `<li>${responsibility}</li>`).join('')}
      </ul>
    `).join('');
  }

  // Create the resume body
  const $resumeBody = $('#resume-body');
  $resumeBody.append(`
    <section class="resume-section vcard">
      <h1 class="resume-name"><a href="../index.html">${resumeData.name}</a></h1>
      ${createAddressHTML(resumeData.address)}
      <div class="tel">
        <p class="tel-type">Work ${resumeData.contact.workPhone}</p>
      </div>
      <div class="email">
        <a href="mailto:${resumeData.contact.email}">${resumeData.contact.email}</a>
      </div>
      <div class="profile-picture">
        <img src="${resumeData.profilePicture}" alt="${resumeData.name}'s Profile Picture">
      </div>
    </section>
    
    <h2 class="resume-section-title">Objective Statement/Intro</h2>
    <p class="resume-section objective-statement">${resumeData.objective}</p>

    <h2 class="resume-section-title">Education</h2>
    ${resumeData.education.map(createEducationHTML).join('')}

    <h2 class="resume-section-title">Work/Experience</h2>
    ${resumeData.workExperience.map(createWorkExperienceHTML).join('')}

    <h2 class="resume-section-title">Skills</h2>
    ${createSkillsHTML(resumeData.skills)}

    <h2 class="resume-section-title">Relevant Coursework</h2>
    ${createRelevantCourseworkHTML(resumeData.relevantCoursework)}

    <h2 class="resume-section-title">Activities</h2>
    ${createActivitiesHTML(resumeData.activities)}
  `);
});
