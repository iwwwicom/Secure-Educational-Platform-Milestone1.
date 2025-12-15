#  Secure Educational Platform - Milestone 1 code Implementation 

## Project Title
Software Security Project - Milestone 1: Threat Modeling and Secure Code Implementation

## Group Information
* **Course:** CCY3101 - Software Security
* **Lecturer:** [‬‏Dr. Nada Sherief]
* **TA:** [Salma Elkady‏]
* **Group Members:**
    * [Adam Ahmed] - [231012251]


---

##  Repository Contents
This repository contains the **SECURE** version of the Educational Platform website, reflecting the mitigations implemented based on the threat model in our Milestone 1 Report.

### Implemented Security Mitigations:(ALL THOSE FILES ARE INSIDE THE FOLDER CALLED metgation -->THIS WHAT I ADDED)

| Vulnerability | Mitigation Technique Used | File Locations |
| :--- | :--- | :--- |
| **Reflected/Stored  XSS** && Cookies Stealing | Input sanitization using `htmlspecialchars()` && some othere methods on all user output and inputs. | `[contact.php, search.php]` |
| **SQL Injection (SQLi)** | Utilized **Prepared Statements** with mysqli_real_escape_string($connection, $_POST['password']) for all database queries. | `[login.php]` |
| **Un-hashed Passwords** | Implemented **password hashing** using PHP's `password_hash()` and `password_verify()`. | `[SignUp.php]` |

---

##  Final Report Link
The full Threat Modeling report (Milestone 1 DOCX/PDF) detailing the assets, architecture, STRIDE, DREAD analysis, and mitigation explanations is located here:

https://studentaast-my.sharepoint.com/:w:/g/personal/a_zidan12251_student_aast_edu/IQA6wEYJfUklRJ3n-CNHY-uXAbtbaihbExakYr6r0BawzgE?e=SK2e9s
