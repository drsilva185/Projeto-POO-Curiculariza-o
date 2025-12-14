package com.delegacias.controller;

import com.delegacias.model.Delegacia;
import com.delegacias.model.Policial;
import com.delegacias.service.DelegaciaService;
import com.delegacias.service.PolicialService;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.ModelAndView;

import java.util.List;

@Controller
@RequestMapping("/policiais")
public class PolicialController {

    private final PolicialService policialService;
    private final DelegaciaService delegaciaService;

    @Autowired
    public PolicialController(PolicialService policialService, DelegaciaService delegaciaService) {
        this.policialService = policialService;
        this.delegaciaService = delegaciaService;
    }

    private void carregarDelegacias(Model model) {
        List<Delegacia> delegacias = delegaciaService.buscarTodas();
        model.addAttribute("delegacias", delegacias);
    }

    @GetMapping
    private String listarPoliciais(Model model) {
        List<Policial> policiais = policialService.buscarTodos();
        model.addAttribute("listarPoliciais", policiais);
        return "policiais/listaPolicial";
    }

    @GetMapping("/novo")
    public String exibirFormulario(Model model) {
        model.addAttribute("policial", new Policial());
        carregarDelegacias(model); // Carrega as opções de Delegacia
        return "policiais/formPolicial";
    }

    @PostMapping
    public String salvarPolicial(@Valid @ModelAttribute("policial") Policial policial,
                                 BindingResult result, Model model) {
        if (result.hasErrors()) {
            carregarDelegacias(model); // Recarrega as delegacias se houver erro
            return "policiais/formPolicial";
        }
        policialService.salvar(policial);
        return "redirect:/policiais";
    }

    @GetMapping("/editar/{id}")
    public ModelAndView editarPolicial(@PathVariable("id") Long id) {
        ModelAndView mv = new ModelAndView("policiais/formPolicial");
        Policial policial = policialService.buscarPorId(id)
                .orElseThrow(() -> new IllegalArgumentException("ID de Policial inválido:" + id));

        mv.addObject("policial", policial);
        mv.addObject("delegacias", delegaciaService.buscarTodas()); // Carrega delegacias para edição
        return mv;
    }

    @GetMapping("/deletar/{id}")
    public String deletarPolicial(@PathVariable("id") Long id) {
        policialService.deletarPorId(id);
        return "redirect:/policiais";
    }

}
