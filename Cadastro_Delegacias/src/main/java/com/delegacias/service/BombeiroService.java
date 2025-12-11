package com.delegacias.service;

import com.delegacias.model.Bombeiro;
import com.delegacias.repository.BombeiroRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;
import java.util.Optional;

@Service
public class BombeiroService {
    private final BombeiroRepository bombeiroRepository;

    @Autowired
    public BombeiroService(BombeiroRepository bombeiroRepository) {
        this.bombeiroRepository = bombeiroRepository;
    }

    @Transactional
    public Bombeiro salvar(Bombeiro bombeiro) {
        return bombeiroRepository.save(bombeiro);
    }

    public List<Bombeiro> buscarTodas() {
        return bombeiroRepository.findAll();
    }

    public Optional<Bombeiro> buscarPorId(Long id) {
        return bombeiroRepository.findById(id);
    }

    @Transactional
    public void deletarPorId(Long id) {
        bombeiroRepository.deleteById(id);
    }

    public List<Bombeiro> buscarPorNome(String nome) {
        return bombeiroRepository.findByNomeContainingIgnoreCase(nome);
    }
}
