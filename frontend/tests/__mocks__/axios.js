export default {
  async get() {
    return {
      data: [{
        agile_id: "1",
        date_created: "2021-10-05 15:22:46",
        date_updated: "2021-10-19 11:54:42",
        description: "This value of the Agile manifesto focuses on giving importance to communication with the clients. There are several things a client may want to ask and it is the responsibility of the team members to ensure that all questions and suggestions of the clients are promptly dealt with.",
        removed: "0",
        title: "Individuals and interactions over processes and tools",
        type: "1",
      },
      {
        agile_id: "2",
        date_created: "2021-10-05 15:22:46",
        date_updated: "2021-10-19 11:54:42",
        description: "In the case of traditional management methodologies, customers get to see the product only after completion and when several tests and quality checks have been performed. This not only keeps the customers in dark but also makes it problematic for the team members to introduce any changes in the product. In order to keep the customers happy, it’s important to continuously engage them with a working version of the product. Show small increments every sprint planning and make changes as required.",
        removed: "0",
        title: "Customer satisfaction through continuous delivery of the product",
        type: "1",
      },
      ],
    };
  },
  async post(path, data) {
    return {
      data: {
        agile_id: "1",
        date_created: "2021-10-05 15:22:46",
        date_updated: "2021-10-19 11:54:42",
        description: "This value of the Agile manifesto focuses on giving importance to communication with the clients. There are several things a client may want to ask and it is the responsibility of the team members to ensure that all questions and suggestions of the clients are promptly dealt with.",
        removed: "0",
        title: "Individuals and interactions over processes and tools",
        type: "1",
      },
    };
  },
  async delete(path) { },
};