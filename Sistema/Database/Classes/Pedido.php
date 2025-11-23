<?php

class Pedido {
    private $idInstrumento;
    private $quantidade;
    private $formaPagamento;
    private $idEndereco;

    public function __construct($idInstrumento, $quantidade, $formaPagamento, $idEndereco) {
        $this->idInstrumento = $idInstrumento;
        $this->quantidade = $quantidade;
        $this->formaPagamento = $formaPagamento;
        $this->idEndereco = $idEndereco;
    }

    public function getIdInstrumento() {
        return $this->idInstrumento;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getFormaPagamento() {
        return $this->formaPagamento;
    }

    public function getIdEndereco() {
        return $this->idEndereco;
    }
}
