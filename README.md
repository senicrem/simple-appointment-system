# Simple Appointment System

This is a simple appointment system built with **Laravel**, **Sail**, and **Livewire**.

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
