package com.delegacias.service;

import com.delegacias.model.Bombeiros;
import com.delegacias.repository.BombeirosRepository;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import java.util.List;
import java.util.Optional;

@Service
public class BombeirosService {
    private final BombeirosRepository bombeirosRepository;

    public BombeirosService(BombeirosRepository bombeirosRepository) {this.bombeirosRepository = bombeirosRepository;}

    @Transactional
    public Bombeiros salvar(Bombeiros bombeiros) { return bombeirosRepository.save(bombeiros);}
    public List<Bombeiros> buscarTodos(){return bombeirosRepository.findAll();}

    public Optional<Bombeiros> buscarPorId(Long id) {return bombeirosRepository.findById(id);}

    public List<Bombeiros> buscarPorBombeiro (Long bombeiro_id){
        return bombeirosRepository.findByBombeiro_Id(bombeiro_id);
    }

    @Transactional
    public void  deletarPorId(Long id) {
        bombeirosRepository.deleteById(id);
    }
}
