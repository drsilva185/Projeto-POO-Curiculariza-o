package com.delegacias.controller;

import com.delegacias.model.Bombeiro;
import com.delegacias.model.Bombeiros;
import com.delegacias.service.BombeiroService;
import com.delegacias.service.BombeirosService;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.ModelAndView;

import java.util.List;

@Controller
@RequestMapping("/bombeiros")
public class BombeirosController {
    private final BombeirosService  bombeirosService;
    private final BombeiroService bombeiroService;

    @Autowired
    public BombeirosController( BombeiroService bombeiroService, BombeirosService  bombeirosService ) {
        this.bombeirosService = bombeirosService;
        this.bombeiroService = bombeiroService;
    }

    private void carregarBombeiro(Model model) {
        List<Bombeiro> bombeiro = bombeiroService.buscarTodas();
        model.addAttribute("bombeiro", bombeiro);
    }

    @GetMapping
    private String listarBombeiros(Model model) {
        List<Bombeiros> bombeiros = bombeirosService.buscarTodos();
        model.addAttribute("listarBombeiros", bombeiros);
        return "bombeiros/listaBombeiros";
    }

    @GetMapping("/novo")
    public String exibirFormulario(Model model) {
        model.addAttribute("bombeiros", new Bombeiros());
        carregarBombeiro(model);
        return "bombeiros/formBombeiros";
    }

    @PostMapping
    public String salvarBombeiros(@Valid @ModelAttribute("bombeiros") Bombeiros bombeiros,
                                 BindingResult result, Model model) {
        if (result.hasErrors()) {
            carregarBombeiro(model); // Recarrega as delegacias se houver erro
            return "bombeiros/formBombeiros";
        }
        bombeirosService.salvar(bombeiros);
        return "redirect:/bombeiros";
    }

    @GetMapping("/editar/{id}")
    public ModelAndView editarBombeiros(@PathVariable("id") Long id) {
        ModelAndView mv = new ModelAndView("bombeiros/formBombeiros");
        Bombeiros bombeiros = bombeirosService.buscarPorId(id)
                .orElseThrow(() -> new IllegalArgumentException("ID de bombeiro inválido:" + id));

        mv.addObject("bombeiros", bombeiros);
        mv.addObject("bombeiro", bombeiroService.buscarTodas()); // Carrega delegacias para edição
        return mv;
    }

    @GetMapping("/deletar/{id}")
    public String deletarBombeiros(@PathVariable("id") Long id) {
        bombeiroService.deletarPorId(id);
        return "redirect:/bombeiros";
    }

}
