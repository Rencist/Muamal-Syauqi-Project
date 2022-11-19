<?php

namespace App\Core\Application\Service\RegisterUser;

class RegisterUserRequest
{
    private string $type;
    private string $email;
    private int $usia;
    private string $no_telp;
    private string $name;
    private string $address;
    private string $password;

    public function __construct(string $type, string $email, int $usia, string $no_telp, string $name, string $address, string $password)
    {
        $this->type = $type;
        $this->email = $email;
        $this->usia = $usia;
        $this->no_telp = $no_telp;
        $this->name = $name;
        $this->address = $address;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getNoTelp(): string
    {
        return $this->no_telp;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getUsia(): int
    {
        return $this->usia;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }
}
