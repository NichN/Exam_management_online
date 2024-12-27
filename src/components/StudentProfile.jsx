import React from "react";
import { ArrowLeft } from "react-feather";
import "./StudentProfile.css";

const StudentProfile = () => {
    const student = {
        name: "Nich",
        studentId: "B20223119",
        gender: "Female",
        course: "COM-24",
        class: "ES1",
        photo: "/path/to/student-photo.jpg",
    };

    const stats = {
        quiz: {
            total: 15,
            attempted: 10,
            passed: 25,
            failed: 25,
        },
        exams: {
            total: 15,
            attempted: 10,
            passed: 25,
            failed: 25,
        },
        assignment: {
            total: 15,
            attempted: 12,
            passed: 25,
            failed: 25,
        },
    };

    return (
        <div className="student-profile">
            <header>
                <button className="back-button">
                    <ArrowLeft size={20} />
                </button>
                <h1>Student Profile</h1>
            </header>

            <div className="profile-content">
                <div className="student-info">
                    <img
                        src={student.photo}
                        alt="Student"
                        className="student-photo"
                    />
                    <div className="info-details">
                        <h2>{student.name}</h2>
                        <p>Student ID: {student.studentId}</p>
                        <p>Gender: {student.gender}</p>
                        <p>Course: {student.course}</p>
                        <p>Class: {student.class}</p>
                    </div>
                </div>

                <div className="contact-box">
                    <h3>Center Contact</h3>
                    <p>📞 12345 65870</p>
                    <p>✉️ hanumannagar.center@tpsg.in</p>
                </div>

                <div className="stats-grid">
                    {["Quiz", "Exams", "Assignment"].map((category) => (
                        <div key={category} className="stat-card">
                            <h3>{category}</h3>
                            <p>
                                Total {category}es:{" "}
                                {stats[category.toLowerCase()].total}
                            </p>
                            <p>
                                Attempted:{" "}
                                {stats[category.toLowerCase()].attempted}
                            </p>
                            <div className="score">
                                <span className="passed">
                                    Passed:{" "}
                                    {stats[category.toLowerCase()].passed}
                                </span>
                                <span className="failed">
                                    Failed:{" "}
                                    {stats[category.toLowerCase()].failed}
                                </span>
                            </div>
                            <button className="view-details">
                                View Details
                            </button>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
};

export default StudentProfile;
