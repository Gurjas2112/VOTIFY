# 🗳️ VOTIFY - Digital Voter Registration Portal

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![PHP Version](https://img.shields.io/badge/PHP-%3E%3D7.4-blue.svg)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-%3E%3D5.7-orange.svg)](https://www.mysql.com/)
[![Python](https://img.shields.io/badge/Python-3.x-green.svg)](https://www.python.org/)

## 📋 Problem Statement

**How can we ensure the registration of new voters in the electoral roll?**

VOTIFY is a comprehensive web-based platform designed to encourage and streamline the registration of new voters in the electoral system. The portal strategically expedites the voter registration process by providing an easy, convenient, and secure way for individuals to register as voters online.

## 🎯 Project Objectives

- **Streamline Registration**: Simplify and accelerate the voter registration process
- **Encourage Participation**: Make voter registration accessible to all eligible citizens
- **Ensure Accuracy**: Implement verification mechanisms to maintain electoral roll integrity
- **Digital Transformation**: Modernize the traditional voter registration system
- **Data Security**: Protect user information with robust security measures

## ✨ Key Features

### 🔐 User Management
- **Secure Registration**: Multi-step registration process with email verification
- **OTP Authentication**: Two-factor authentication for enhanced security
- **User Profile Management**: Update personal information and review registration details
- **Password Reset**: Secure password recovery mechanism

### 📄 Document Verification
- **Aadhar Card Verification**: OCR-based automatic Aadhar card validation using Tesseract
- **Photo Verification**: Face detection to ensure authentic user photographs using OpenCV
- **Secure Document Storage**: Encrypted storage of identification documents
- **Document Upload**: Support for multiple document formats

### 👥 Administrative Features
- **Admin Dashboard**: Comprehensive overview of registration statistics
- **User Management**: Monitor and manage registered voters
- **Document Verification Panel**: Review and approve submitted documents
- **Analytics Dashboard**: Visual data presentation with charts and graphs (Bar graphs, Pie charts)
- **Profile Management**: Admin profile customization

### 📊 Data Visualization
- **Interactive Charts**: Bar graphs and pie charts for registration statistics
- **Real-time Updates**: Dynamic data presentation using AJAX
- **Visual Reports**: Infographics for better data understanding
- **PDF Generation**: Export reports in PDF format using mPDF

### 🌐 User Experience
- **Responsive Design**: Mobile-friendly interface using Bootstrap
- **Intuitive Navigation**: Easy-to-use interface with clear guidance
- **Location Support**: Automatic state and city selection
- **Multi-language Support**: Accessible to diverse user groups
- **FAQ Section**: Comprehensive help documentation

## 🛠️ Technology Stack

### Backend
- **PHP 7.4+**: Server-side scripting and business logic
- **MySQL**: Database management for user and registration data
- **Python 3.x**: Document verification and image processing
- **PDO**: Secure database connectivity with prepared statements

### Frontend
- **HTML5 & CSS3**: Semantic markup and modern styling
- **JavaScript (ES6+)**: Client-side interactivity
- **AJAX**: Asynchronous data operations
- **jQuery**: DOM manipulation and event handling
- **Bootstrap 5**: Responsive framework

### Libraries & Tools
- **OpenCV (cv2)**: Face detection and image processing
- **Tesseract OCR**: Optical character recognition for document verification
- **PHPMailer**: Email functionality for OTP and notifications
- **mPDF**: PDF document generation
- **JpGraph**: Advanced chart generation
- **Composer**: PHP dependency management

### Design Framework
- **Material Design**: Modern UI/UX principles
- **AOS (Animate On Scroll)**: Smooth scroll animations
- **Boxicons**: Icon library

## 📁 Project Structure

```
VOTIFY/
├── Admin/                          # Admin panel interface
│   └── assets/                     # Admin-specific assets
├── python_code/                    # Python verification scripts
│   ├── face_recognition.py         # Photo verification
│   └── ocr_verification.py         # Aadhar card verification
├── uploads/                        # Document storage
│   ├── aadhar_card/               # Verified Aadhar cards
│   └── photo/                     # Verified photos
├── sql/                           # Database schema
│   └── votify.sql                 # Database structure
├── css/                           # Stylesheets
├── js/                            # JavaScript files
├── vendor/                        # Composer dependencies
├── external_package/              # OpenCV models
├── forms/                         # Form handlers
├── db_connect.php                 # Database configuration
├── signup.php                     # User registration
├── login.php                      # User authentication
├── dashboard-mainpage.php         # User dashboard
├── Admin-Admin_Dashboard.php      # Admin dashboard
├── fileupload_backend.php         # Document upload handler
└── composer.json                  # PHP dependencies
```

## 🚀 Getting Started

### Prerequisites

- **XAMPP/WAMP/LAMP** (Apache, PHP 7.4+, MySQL 5.7+)
- **Python 3.x** with pip
- **Composer** (PHP package manager)
- **Tesseract OCR** installed and configured
- Web browser (Chrome, Firefox, Edge)

### Installation Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/Gurjas2112/VOTIFY.git
   cd VOTIFY
   ```

2. **Install PHP Dependencies**
   ```bash
   composer install
   ```

3. **Install Python Dependencies**
   ```bash
   pip install opencv-python pytesseract pillow
   ```

4. **Install Tesseract OCR**
   - Download from: https://github.com/tesseract-ocr/tesseract
   - Install to: `C:/Program Files/Tesseract-OCR/`
   - Update path in `python_code/ocr_verification.py` if needed

5. **Database Setup**
   - Start Apache and MySQL in XAMPP/WAMP
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named `votify`
   - Import `sql/votify.sql` file

6. **Configure Database Connection**
   - Open `db_connect.php`
   - Update database credentials if necessary:
     ```php
     $db_host = "localhost";
     $db_name = "votify";
     $db_user = "root";
     $db_pass = "";
     ```

7. **Configure Email Settings** (for OTP functionality)
   - Update SMTP settings in PHPMailer configuration files

8. **Start the Application**
   - Place the project folder in your web server directory (htdocs/www)
   - Access the application: `http://localhost/VOTIFY/homepage.php`

## 📖 Usage Guide

### For Voters

1. **Registration**
   - Visit the homepage and click "Sign Up"
   - Fill in personal details (Name, Email, Phone, DOB, Address)
   - Upload required documents (Aadhar Card, Photo)
   - Verify email through OTP
   - Complete registration

2. **Login & Dashboard**
   - Login with registered credentials
   - View registration status
   - Update profile information
   - Download voter ID card (PDF)

3. **Document Upload**
   - Navigate to profile section
   - Upload clear images of Aadhar card
   - Upload passport-size photograph
   - Wait for admin verification

### For Administrators

1. **Admin Login**
   - Access admin panel: `http://localhost/VOTIFY/admin.php`
   - Login with admin credentials

2. **Dashboard Management**
   - View registration statistics
   - Monitor daily/weekly/monthly registrations
   - Analyze demographics with charts

3. **Document Verification**
   - Review pending document submissions
   - Approve or reject Aadhar card verification
   - Validate user photographs
   - Manage user accounts

4. **User Management**
   - View all registered users
   - Edit user information
   - Deactivate/activate accounts
   - Generate reports

## 🔒 Security Features

- **Password Hashing**: Bcrypt encryption for password storage
- **Prepared Statements**: SQL injection prevention
- **OTP Verification**: Two-factor authentication
- **Session Management**: Secure session handling
- **CSRF Protection**: Cross-site request forgery prevention
- **File Upload Validation**: Restricted file types and sizes
- **Secure Document Storage**: Encrypted document repository

## 📊 Database Schema

Key tables include:
- `users` - User account information
- `voter_registration` - Voter registration details
- `documents` - Uploaded document metadata
- `admin` - Administrator accounts
- `otp_verification` - OTP records
- `election_info` - Election details

## 🎨 UI/UX Highlights

- Clean and modern Material Design interface
- Responsive design for mobile, tablet, and desktop
- Intuitive navigation with breadcrumbs
- Progress indicators for multi-step processes
- Real-time form validation
- Accessible design following WCAG guidelines

## 🧪 Testing

- Manual testing of all user flows
- Document verification accuracy testing
- Cross-browser compatibility testing
- Mobile responsiveness testing
- Load testing for concurrent users

## 🐛 Known Issues & Limitations

- Python integration requires proper Tesseract installation
- OCR accuracy depends on document image quality
- Large file uploads may require php.ini configuration
- Email functionality requires SMTP configuration

## 🔄 Future Enhancements

- [ ] Integration with national electoral database
- [ ] Blockchain-based voter ID verification
- [ ] Mobile application (Android/iOS)
- [ ] Multi-language interface
- [ ] Biometric authentication
- [ ] AI-powered document fraud detection
- [ ] Real-time voter eligibility checking
- [ ] Integration with government APIs (DigiLocker)
- [ ] SMS notifications
- [ ] Dark mode theme

## 🤝 Contributing

We welcome contributions from the community to enhance VOTIFY!

### How to Contribute

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

Please read our [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of conduct and development process.

## 👨‍💻 Authors

- **Gurjas Singh** - *Initial work* - [Gurjas2112](https://github.com/Gurjas2112)

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- Election Commission for inspiration
- OpenCV community for face detection models
- Tesseract OCR for document recognition
- Bootstrap team for responsive framework
- All contributors and testers

## 📞 Support

For support, email votify.support@example.com or open an issue in the GitHub repository.

## 📚 Documentation

For detailed documentation, visit our [Wiki](https://github.com/Gurjas2112/VOTIFY/wiki).

---

**Made with ❤️ for democratic participation**

*Last Updated: November 2025*
