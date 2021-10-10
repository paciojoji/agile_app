import { mount, createLocalVue } from '@vue/test-utils'
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'

import Home from '@/components/Home.vue'
import AddData from '@/components/AddData.vue'
import EditData from '@/components/EditData.vue'

const localVue = createLocalVue()
localVue.use(BootstrapVue)
localVue.use(BootstrapVueIcons)

describe('Test Home Component', () => {
    const wrapper = mount(Home, { localVue })

    test('check if components are existing', async() => {
        expect(wrapper.findComponent(AddData).exists()).toBe(true)
        expect(wrapper.findComponent(EditData).exists()).toBe(true)
    })

    it('Clicking on add button opens the add modal', async() => {
        const add_button = wrapper.find('#add-button')
        const add_modal = wrapper.find('#add-data-modal')

        expect(add_modal.isVisible()).toBe(false)

        await add_button.trigger('click')

        expect(add_modal.isVisible()).toBe(true)

    })

})