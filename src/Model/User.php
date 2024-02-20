<?php

namespace App\Model;

class User
{
    private ?int $id = null;
    private ?string $fullname = null;
    private ?string $email = null;
    private ?string $password = null;
    private array $role = [];

    public function __construct(?int $id = null, ?string $fullname = null, ?string $email = null, ?string $password = null, array $role = [])
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): User
    {
        $this->id = $id;
        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(?string $fullname): User
    {
        $this->fullname = $fullname;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getRole(): array
    {
        return $this->role;
    }

    public function setRole(array $role): User
    {
        $this->role = $role;
        return $this;
    }

    // Database-related methods

    public function findOneById(int $id): static|false
    {
        // Example implementation using a PDO connection (replace with your actual database logic)
        $pdo = new \PDO('mysql:host=localhost;dbname=your_database', 'your_username', 'your_password');
        $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(\PDO::FETCH_ASSOC);

        if (!$result) {
            return false;
        }

        return new static(
            $result['id'],
            $result['fullname'],
            $result['email'],
            $result['password'],
            json_decode($result['role'], true)
        );
    }

    public function findAll(): array
    {
        // Example implementation using a PDO connection (replace with your actual database logic)
        $pdo = new \PDO('mysql:host=localhost;dbname=your_database', 'your_username', 'your_password');
        $statement = $pdo->prepare('SELECT * FROM users');
        $statement->execute();
        $results = $statement->fetchAll(\PDO::FETCH_ASSOC);

        $users = [];
        foreach ($results as $result) {
            $users[] = new static(
                $result['id'],
                $result['fullname'],
                $result['email'],
                $result['password'],
                json_decode($result['role'], true)
            );
        }

        return $users;
    }

    public function create(): static
    {

        // Example implementation using a PDO connection (replace with your actual database logic)
        $pdo = new \PDO('mysql:host=localhost;dbname=your_database', 'your_username', 'your_password');
        $sql = "INSERT INTO users (fullname, email, password, role) VALUES (:fullname, :email, :password, :role)";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':fullname', $this->getFullname());
        $statement->bindValue(':email', $this->getEmail());
        $statement->bindValue(':password', $this->getPassword());
        $statement->bindValue(':role', json_encode($this->getRole()));
        $statement->execute();

        $this->setId((int)$pdo->lastInsertId());

        return $this;
    }

    public function update(): static
    {

        // Example implementation using a PDO connection (replace with your actual database logic)
        $pdo = new \PDO('mysql:host=localhost;dbname=your_database', 'your_username', 'your_password');
        $sql = "UPDATE users SET fullname = :fullname, email = :email, password = :password, role = :role WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $this->getId());
        $statement->bindValue(':fullname', $this->getFullname());
        $statement->bindValue(':email', $this->getEmail());
        $statement->bindValue(':password', $this->getPassword());
        $statement->bindValue(':role', json_encode($this->getRole()));
        $statement->execute();

        return $this;
    }
}
