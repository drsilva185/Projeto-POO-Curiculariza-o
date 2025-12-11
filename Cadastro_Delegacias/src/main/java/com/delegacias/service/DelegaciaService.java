package com.delegacias.service;

import com.delegacias.model.Delegacia;
import com.delegacias.repository.DelegaciaRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;
import java.util.Optional;

@Service
public class DelegaciaService {
    private final DelegaciaRepository delegaciaRepository;

    // 2. Injeção de Dependência via Construtor (método preferido)
    @Autowired
    public DelegaciaService(DelegaciaRepository delegaciaRepository) {
        this.delegaciaRepository = delegaciaRepository;
    }

    @Transactional // 3. Garante que a operação seja atômica (transacional)
    public Delegacia salvar(Delegacia delegacia) {
        // Exemplo de lógica de negócio: poderíamos adicionar validações ou regras aqui
        return delegaciaRepository.save(delegacia);
    }

    public List<Delegacia> buscarTodas() {
        return delegaciaRepository.findAll();
    }

    public Optional<Delegacia> buscarPorId(Long id) {
        return delegaciaRepository.findById(id);
    }

    @Transactional
    public void deletarPorId(Long id) {
        delegaciaRepository.deleteById(id);
    }

    public List<Delegacia> buscarPorNome(String nome) {
        return delegaciaRepository.findByNomeContainingIgnoreCase(nome);
    }
}
