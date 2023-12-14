<?php

class Library
{
    private $members = [];
    private $books = [];
    private $transactions = [];

    private $dataFile = 'data.txt';

    public function __construct()
    {
        // Load data from file when the Library object is created
        $this->loadData();
    }

    public function registerMember($nama, $email, $password)
    {
        $member = [
            'id' => count($this->members) + 1,
            'nama' => $nama,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ];

        $this->members[] = $member;
        $this->saveData(); // Save data to file after registration
        return $member['id'];
    }

    public function borrowBook($member_id, $book_id)
    {
        $transaction = [
            'id' => count($this->transactions) + 1,
            'member_id' => $member_id,
            'book_id' => $book_id,
            'tipe_transaksi' => 'pinjam',
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
        ];

        $this->transactions[] = $transaction;
        return $transaction['id'];
    }

    public function returnBook($member_id, $book_id)
    {
        $transaction = [
            'id' => count($this->transactions) + 1,
            'member_id' => $member_id,
            'book_id' => $book_id,
            'tipe_transaksi' => 'kembali',
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
        ];

        $this->transactions[] = $transaction;
        return $transaction['id'];
    }

    public function getTransactionHistory($member_id)
    {
        $history = [];
        foreach ($this->transactions as $transaction) {
            if ($transaction['member_id'] == $member_id) {
                $history[] = $transaction;
            }
        }
        return $history;
    }

    private function loadData()
    {
        if (file_exists($this->dataFile)) {
            $data = file_get_contents($this->dataFile);
            $data = unserialize($data);

            if (isset($data['members'])) {
                $this->members = $data['members'];
            }

            if (isset($data['books'])) {
                $this->books = $data['books'];
            }

            if (isset($data['transactions'])) {
                $this->transactions = $data['transactions'];
            }
        }
    }

    private function saveData()
    {
        $data = [
            'members' => $this->members,
            'books' => $this->books,
            'transactions' => $this->transactions,
        ];

        $data = serialize($data);
        file_put_contents($this->dataFile, $data);
    }

    public function getMemberDetails($member_id)
    {
        foreach ($this->members as $member) {
            if ($member['id'] == $member_id) {
                return $member;
            }
        }

        return null;
    }
}

?>
