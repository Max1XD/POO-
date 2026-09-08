<?php

require_once __DIR__ . '/Usuario.php';

class Tecnico extends Usuario
{
    private string $especialidad;

    public function __construct(string $nombre, string $email, string $especialidad)
    {
        parent::__construct($nombre, $email);
        $this->setEspecialidad($especialidad);
    }

    private function setEspecialidad(string $especialidad): void
    {
        $especialidad = trim($especialidad);

        if ($especialidad === '') {
            throw new InvalidArgumentException("La especialidad no puede estar vacía.");
        }

        $this->especialidad = $especialidad;
    }

    public function getEspecialidad(): string
    {
        return $this->especialidad;
    }

    public function mostrarEspecialidad(): void
    {
        echo "Especialidad: {$this->especialidad}" . PHP_EOL;
    }
}
