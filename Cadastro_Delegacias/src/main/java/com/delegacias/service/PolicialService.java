package com.delegacias.service;

import com.delegacias.model.Policial;
import com.delegacias.repository.PolicialRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;
import java.util.Optional;

@Service
public class PolicialService {
    private final PolicialRepository policialRepository;

    @Autowired
    public PolicialService(PolicialRepository policialRepository) {
        this.policialRepository = policialRepository;
    }

    @Transactional
    public Policial salvar(Policial policial) {
        return policialRepository.save(policial);
    }
    public List<Policial> buscarTodos() {
        return policialRepository.findAll();
    }

    public Optional<Policial> buscarPorId(Long id) {
        return policialRepository.findById(id);
    }

    public List<Policial> buscarPorDelegacia(Long delegacia_id) {
        return policialRepository.findByDelegacia_Id(delegacia_id);
    }

    @Transactional
    public void deletarPorId(Long id) {
        policialRepository.deleteById(id);
    }
}
