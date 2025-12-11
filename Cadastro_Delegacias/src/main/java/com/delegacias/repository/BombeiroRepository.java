package com.delegacias.repository;

import com.delegacias.model.Bombeiro;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface BombeiroRepository extends JpaRepository<Bombeiro, Long> {
    List<Bombeiro> findByNomeContainingIgnoreCase(String nome);
    Bombeiro findByTelefone(String telefone);
}
