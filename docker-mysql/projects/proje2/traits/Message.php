<?php
namespace traits;
trait Message
{
    public string $fullname;
    public function gonder(string $mesaj): string
    {
        return $mesaj;
    }

    public function setFullname(): void
    {
        $this->fullname = $this->getName() . " " . $this->getLastname();
    }

    public function getFullname(): string
    {
        return $this->fullname;
    }
}
