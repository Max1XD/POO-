<?php

require_once __DIR__ . '/Usuario.php';

class Administrador extends Usuario
{
    private string $nivel;

    public function __construct(string $nombre, string $email, string $nivel)
    {
        parent::__construct($nombre, $email);
        $this->setNivel($nivel);
    }

    private function setNivel(string $nivel): void
    {
        $nivel = trim($nivel);

        if ($nivel === '') {
            throw new InvalidArgumentException("El nivel no puede estar vacío.");
        }

        $this->nivel = $nivel;
    }

    public function getNivel(): string
    {
        return $this->nivel;
    }

    public function mostrarNivel(): void
    {
        echo "Nivel: {$this->nivel}" . PHP_EOL;
    }
}
