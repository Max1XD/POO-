<?php

/**
 * Clase base del sistema.
 * Los atributos son protegidos: solo esta clase y sus hijas pueden tocarlos.
 */
class Usuario
{
    protected string $nombre;
    protected string $email;

    public function __construct(string $nombre, string $email)
    {
        // Las validaciones viven adentro de la clase, no en el archivo de pruebas.
        $this->setNombre($nombre);
        $this->setEmail($email);
    }

    protected function setNombre(string $nombre): void
    {
        $nombre = trim($nombre);

        if ($nombre === '') {
            throw new InvalidArgumentException("El nombre no puede estar vacío.");
        }

        $this->nombre = $nombre;
    }

    protected function setEmail(string $email): void
    {
        $email = trim($email);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("El email '$email' no tiene un formato válido.");
        }

        $this->email = $email;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function mostrarDatos(): void
    {
        echo "Nombre: {$this->nombre} - Email: {$this->email}" . PHP_EOL;
    }
}
