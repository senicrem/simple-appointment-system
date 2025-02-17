## Overview

This is a simple appointment system designed to help users manage appointments efficiently. The application is built using Livewire, a full-stack framework for Laravel, to provide a dynamic and interactive user experience. The system consists of two main interfaces: one for clients and one for administrators. This project is a practice project, so there is no authentication or login system.

## Features

### Client Side
- **Simple Calendar View**: Clients can view a calendar that displays available appointment slots.
- **Appointment Details**: On the right side of the calendar, clients can see details of their appointments.
- **Set Appointments**: Clients can easily set new appointments by accessing the root link (`localhost/`).

### Admin Side
- **View Appointments by Month and Year**: Administrators can view all appointments filtered by month and year.
- **Manage Appointment Status**: Admins can update the status of appointments (e.g., mark as done, cancelled, etc.).
- **Admin Page**: Accessible at `/localhost/admin`.
  
## Technologies Used

- **Laravel**: The PHP framework used for backend development.
- **Sail**: The official Docker development environment for Laravel.
- **Livewire**: A full-stack framework for Laravel that makes building dynamic interfaces simple, without leaving the comfort of Laravel.

## Features

- Easy appointment scheduling
- Real-time updates with Livewire
- Docker-based local development environment with Laravel Sail

## Installation

Follow the steps below to get the project running locally.

### Prerequisites

- Docker
- Docker Compose

### Clone the Repository

```bash
git clone <repository-url>
cd <repository-directory>

./vendor/bin/sail artisan migrate

./vendor/bin/sail up
