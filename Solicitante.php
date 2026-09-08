<?php

require_once __DIR__ . '/Usuario.php';

class Solicitante extends Usuario
{
    private string $sector;

    public function __construct(string $nombre, string $email, string $sector)
    {
        // Reutiliza la lógica y las validaciones de Usuario.
        parent::__construct($nombre, $email);
        $this->setSector($sector);
    }

    private function setSector(string $sector): void
    {
        $sector = trim($sector);

        if ($sector === '') {
            throw new InvalidArgumentException("El sector no puede estar vacío.");
        }

        $this->sector = $sector;
    }

    public function getSector(): string
    {
        return $this->sector;
    }

    public function mostrarSector(): void
    {
        echo "Sector: {$this->sector}" . PHP_EOL;
    }
}
