# VetCare System App

Sistema de gestión veterinaria desarrollado en Laravel para la administración de mascotas y usuarios.

## Características Principales

- **Autenticación segura** con sistema de login, registro y "recordar sesión"
- **Dashboard principal** con navegación a las diferentes secciones
- **Gestión de usuarios** con roles y permisos diferenciados
- **Gestión de mascotas** con historial médico y estado activo/inactivo
- **Sistema de roles** con tres niveles de acceso

## Funcionalidades por Rol

### 👨‍💼 Administrador
- Acceso completo al sistema
- Gestión total de usuarios (crear, editar, eliminar)
- Modificación de roles y permisos
- Acceso a todas las mascotas registradas

### 👩‍⚕️ Staff  
- Acceso moderado al sistema
- Gestión limitada de usuarios
- Acceso a la gestión de mascotas
- Capacidad de editar información de mascotas

### 👤 Cliente
- Acceso a su perfil y dashboard
- Gestión de sus propias mascotas
- Visualización del historial médico de sus mascotas
- Capacidad de registrar nuevas mascotas

## Tecnologías Utilizadas

- **Laravel 12.40.0** - Framework PHP
- **PHP 8.3.25** - Lenguaje de programación
- **Tailwind CSS** - Framework de estilos
- **SQLite** - Base de datos (en desarrollo)
- **Laravel Breeze** - Sistema de autenticación

## Instrucciones para como ejecutarlo

1) Clonar el proyecto guardado en GitHub en VSC
2) Ejecutar en la terminal php artisan server y npm run dev en ambas terminales separadas
3) Abrir con el enlace desde la barra de busqueda en la página web para que te diriga
4) Registrarse con los datos del correo y contraseña solicitados en UserSeeder.php

## Estructura del Proyecto

✅ **Completado** - Sistema funcional con todas las características básicas implementadas
