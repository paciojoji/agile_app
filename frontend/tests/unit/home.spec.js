import { shallowMount, mount, createLocalVue } from "@vue/test-utils";
import flushPromises from "flush-promises";
import { BootstrapVue, BootstrapVueIcons } from "bootstrap-vue";

import Home from "@/components/Home.vue";
import AddData from "@/components/AddData.vue";
import EditData from "@/components/EditData.vue";
import axios from "axios";

const localVue = createLocalVue();
localVue.use(BootstrapVue);
localVue.use(BootstrapVueIcons);

jest.mock("axios", () => ({
  get: jest.fn()
}));

describe("Test Home Component", () => {
  const wrapper = mount(Home, { localVue });

  test("renders sub-components when the component is created", async () => {
    expect(wrapper.findComponent(AddData).exists()).toBeTruthy();
    expect(wrapper.findComponent(EditData).exists()).toBeTruthy();
  });

  it("Clicking on add button opens the add modal", async () => {
    const add_button = wrapper.find("#add-button");
    const add_modal = wrapper.find("#add-data-modal");

    expect(add_modal.isVisible()).toBe(false);

    await add_button.trigger("click");

    expect(add_modal.isVisible()).toBe(true);
  });

  it("fetches data from the server", async () => {
    expect(axios.get).toHaveBeenCalledTimes(1);
    expect(axios.get).toHaveBeenCalledWith("/get-all-agile");
  });

});